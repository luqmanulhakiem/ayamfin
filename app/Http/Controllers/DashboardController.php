<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $year = now()->year;
        $month = now()->month;

        // Get monthly income and expenses data
        $monthlyIncome = $this->getMonthlyIncome($year);
        $monthlyExpenses = $this->getMonthlyExpenses($year);

        // Prepare the data arrays
        $months = $this->getMonthNames();
        $incomeData = $this->prepareData($monthlyIncome);
        $expensesData = $this->prepareData($monthlyExpenses);

        // Get monthly expenses by category for pie chart
        $monthlyExpensesByCategory = $this->getMonthlyExpensesByCategory($year, $month);

        // Get data for chart.js
        $expenseLabels = array_keys($monthlyExpensesByCategory);
        $expenseData = array_values($monthlyExpensesByCategory);

        return view('src.pages.dashboard.index', compact('months', 'incomeData', 'expensesData', 'expenseLabels', 'expenseData'));
    }

    // Get monthly income data
    private function getMonthlyIncome($year)
    {
        return DB::table('transaksis')
            ->join('kategoris', 'transaksis.category_id', '=', 'kategoris.id')
            ->where('kategoris.type', 'pemasukan')
            ->whereYear('transaksis.date_transaction', $year)
            ->select(
                DB::raw('MONTH(date_transaction) as month'),
                DB::raw('SUM(amount) as total_amount')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_amount', 'month')
            ->all();
    }

    // Get monthly expenses data
    private function getMonthlyExpenses($year)
    {
        return DB::table('transaksis')
            ->join('kategoris', 'transaksis.category_id', '=', 'kategoris.id')
            ->where('kategoris.type', 'pengeluaran')
            ->whereYear('transaksis.date_transaction', $year)
            ->select(
                DB::raw('MONTH(date_transaction) as month'),
                DB::raw('ABS(SUM(amount)) as total_amount') // Using ABS to turn negative values positive
            )
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_amount', 'month')
            ->all();
    }

    // Get the names of the months
    private function getMonthNames()
    {
        return ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    }

    // Prepare the data for chart (set all to 0 by default)
    private function prepareData($data)
    {
        $dataArray = array_fill(0, 12, 0);

        foreach ($data as $month => $amount) {
            $dataArray[$month - 1] = $amount;
        }

        return $dataArray;
    }

    // Get monthly expenses by category for a given month
    private function getMonthlyExpensesByCategory($year, $month)
    {
        return DB::table('transaksis')
            ->join('kategoris', 'transaksis.category_id', '=', 'kategoris.id')
            ->where('kategoris.type', 'pengeluaran')
            ->whereYear('transaksis.date_transaction', $year)
            ->whereMonth('transaksis.date_transaction', $month)
            ->select(
                'kategoris.name as category_name',
                DB::raw('ABS(SUM(amount)) as total_amount')
            )
            ->groupBy('category_name')
            ->pluck('total_amount', 'category_name')
            ->all();
    }
}
