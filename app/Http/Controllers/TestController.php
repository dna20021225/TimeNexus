<?php

namespace App\Http\Controllers;

use App\Models\DocumentCategory;

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
}