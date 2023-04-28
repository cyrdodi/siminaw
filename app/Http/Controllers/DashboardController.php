<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function index()
  {
    $applications = Application::where('is_active', 1);
    $listTechnology = DB::select("SELECT technology, COUNT(*) AS count
      FROM applications
      CROSS JOIN JSON_TABLE(technologies, '$[*]' COLUMNS(technology VARCHAR(255) PATH '$')) AS tech
      WHERE is_active = 1
      GROUP BY technology
      ORDER BY count DESC
      LIMIT 5");

    $managedByDiskomsantik = DB::select("SELECT COUNT(*) AS count
    FROM application_organization a 
    JOIN applications b ON b.id = a.application_id
    WHERE a.organization_id = '1' AND b.is_active = '1'");
    $managedByDiskomsantik = $managedByDiskomsantik[0]->count;

    return view('dashboard.index', compact('applications', 'listTechnology', 'managedByDiskomsantik'));
  }
}
