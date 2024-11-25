<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentCategory;
use App\Models\ExpenseApplication;
use App\Models\ExpenseDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function dashboard()
    {
        $categoriesWithItems = DocumentCategory::getCategoriesWithItems();
        $documentName = 'ダッシュボード';
        session(['documentName' => $documentName]);
        return view('dashboard', compact('categoriesWithItems', 'documentName'));
    }

    public function showDocument($category, $id)
    {
        $categoriesWithItems = DocumentCategory::getCategoriesWithItems();
        
        if (!isset($categoriesWithItems[$category][$id])) {
            abort(404);
        }

        $documentName = $categoriesWithItems[$category][$id];
        session(['documentName' => $documentName]);
        // カテゴリーとIDに基づいて適切なビューを返す
        switch ($documentName) {
            case '経費申請書':
                return view('documents.application_for_expenses', compact('documentName'));
            case '通勤手当申請書':
                return view('documents.commute_allowance_application', compact('documentName'));
            case '駐在旅費仮払申請書':
                return view('documents.travel_expense_advance_application', compact('documentName'));
            case '稟議書':
                return view('documents.resolution', compact('documentName'));
            case '慶弔見舞申請書':
                return view('documents.congratolatory_payment_application', compact('documentName'));
            case '資格申請書':
                return view('documents.qualification_application', compact('documentName'));
            case '出張旅費申請書':
                return view('documents.travel_expense_application', compact('documentName'));
            case '通勤費精算書':
                return view('documents.commute_expense_statement', compact('documentName'));
            case '年末年始手当申請書':
                return view('documents.year_end_and_new_year_allowance_application', compact('documentName'));
            case '旅費支給申請書':
                return view('documents.travel_expense_payment_application', compact('documentName'));
            case '月間作業報告書':
                return view('documents.monthly_work_report', compact('documentName'));
            case '週間作業報告書':
                return view('documents.weekly_work_report', compact('documentName'));
            case '社外研修報告書':
                return view('documents.external_training_report', compact('documentName'));
            case '出張計画書':
                return view('documents.business_trip_plan', compact('documentName'));
            case '出張報告書':
                return view('documents.business_trip_report', compact('documentName'));
            case '休職届':
                return view('documents.leave_of_absence_notice', compact('documentName'));
            case '自己申請書':
                return view('documents.self_application', compact('documentName'));
            case '作業確認20日〆':
                return view('documents.work_confirmation_20th', compact('documentName'));
            case '作業確認31日〆':
                return view('documents.work_confirmation_31st', compact('documentName'));
            case '勤務予測':
                return view('documents.work_forecast', compact('documentName'));
            default:
                abort(404);
        }

    }
    public function storeExpenseApplication(Request $request)
    {
        try {
            $validated = $request->validate([
                'date' => 'required|date',
                'expense_category' => 'required|string',
                'client_billable' => 'required|string',
                'details' => 'required|array|min:1',
                'details.*.date' => 'required|date',
                'details.*.description' => 'required|string|max:255',
                'details.*.unit_price' => 'required|numeric|min:0',
                'details.*.quantity' => 'required|numeric|min:0',
                'details.*.total' => 'required|numeric|min:0',
            ]);

            DB::beginTransaction();

            try {
                // 経費申請の作成
                $application = ExpenseApplication::create([
                    'user_id' => Auth::id(),
                    'application_date' => $validated['date'],
                    'expense_category' => $validated['expense_category'],
                    'client_billable' => $validated['client_billable'] === '可',
                    'total_amount' => collect($validated['details'])->sum('total'),
                    'status' => ExpenseApplication::STATUS_PENDING,
                ]);

                Log::info('Application created:', ['application' => $application->toArray()]);

                // 経費明細の作成
                foreach ($validated['details'] as $detail) {
                    $expenseDetail = $application->details()->create([
                        'expense_date' => $detail['date'],
                        'description' => $detail['description'],
                        'unit_price' => $detail['unit_price'],
                        'quantity' => $detail['quantity'],
                        'amount' => $detail['total'],
                    ]);
                    
                    Log::info('Detail created:', ['detail' => $expenseDetail->toArray()]);
                }

                DB::commit();
                return back()->with('success', '経費申請を登録しました。');

            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Transaction failed:', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
                throw $e;
            }

        } catch (\Exception $e) {
            Log::error('Validation or other error:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()
                ->withInput()
                ->withErrors(['error' => '経費申請の登録に失敗しました。' . $e->getMessage()]);
        }
    }

    public function moduleTest()
    {
        $categoriesWithItems = DocumentCategory::getCategoriesWithItems();
        $documentName = 'モジュールテスト';
        session(['documentName' => $documentName]);

        return view('module_test', compact('categoriesWithItems', 'documentName'));
    }

    public function createAttendance(Request $request)
    {
        $user = Auth::user();
        $user->is_attendance = true;
        $user->save();
        
        // フラッシュメッセージ用のデータを作成
        $attendanceData = [
            'message' => '出勤しました',
            'company' => $request->company,
            'department' => $request->department,
            'is_flex' => $request->is_flextime,
            'is_remote' => $request->is_remote,
            'is_office' => $request->is_office,
            'timestamp' => now()
        ];


    
        $documentName = 'ダッシュボード';
        session(['documentName' => $documentName]);
        
        return redirect()->route('dashboard')->with('attendance', $attendanceData);
    }

    public function leaveAttendance(Request $request)
    {
        // ユーザー状態(is_attendance)を更新
        $user = Auth::user();
        $user->is_attendance = false;
        $user->save();
        $documentName = 'ダッシュボード';
        session(['documentName' => $documentName]);
        return redirect()->route('dashboard')->with('leave', '退勤しました');
    }

    public function worktable()
    {
        $documentName = '勤務表';
        session(['documentName' => $documentName]);
        return view('worktable', compact('documentName'));
    }
}