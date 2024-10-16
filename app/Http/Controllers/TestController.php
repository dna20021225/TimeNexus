<?php

namespace App\Http\Controllers;

use App\Models\DocumentCategory;

class TestController extends Controller
{
    public function dashboard()
    {
        $categoriesWithItems = DocumentCategory::getCategoriesWithItems();
        return view('dashboard', compact('categoriesWithItems'));
    }

    public function showDocument($category, $id)
    {
        $categoriesWithItems = DocumentCategory::getCategoriesWithItems();
        
        if (!isset($categoriesWithItems[$category][$id])) {
            abort(404);
        }

        $documentName = $categoriesWithItems[$category][$id];
        
        // カテゴリーとIDに基づいて適切なビューを返す
        switch ($documentName) {
            case '経費申請書':
                return view('documents.application_for_expenses');
            case '通勤手当申請書':
                return view('documents.commute_allowance_application');
            case '駐在旅費仮払申請書':
                return view('documents.travel_expense_advance_application');
            case '稟議書':
                return view('documents.resolution');
            case '慶弔見舞申請書':
                return view('documents.congratolatory_payment_application');
            case '資格申請書':
                return view('documents.qualification_application');
            case '出張旅費申請書':
                return view('documents.travel_expense_application');
            case '通勤費精算書':
                return view('documents.commute_expense_statement');
            case '年末年始手当申請書':
                return view('documents.year_end_and_new_year_allowance_application');
            case '旅費支給申請書':
                return view('documents.travel_expense_payment_application');
            case '月間作業報告書':
                return view('documents.monthly_work_report');
            case '週間作業報告書':
                return view('documents.weekly_work_report');
            case '社外研修報告書':
                return view('documents.external_training_report');
            case '出張計画書':
                return view('documents.business_trip_plan');
            case '出張報告書':
                return view('documents.business_trip_report');
            case '休職届':
                return view('documents.leave_of_absence_notice');
            case '自己申請書':
                return view('documents.self_application');
            case '作業確認20日〆':
                return view('documents.work_confirmation_20th');
            case '作業確認31日〆':
                return view('documents.work_confirmation_31st');
            case '勤務予測':
                return view('documents.work_forecast');
            default:
                abort(404);
        }
    }
}