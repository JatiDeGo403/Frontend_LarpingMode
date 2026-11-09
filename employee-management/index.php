<?php

require_once 'config/database.php';
require_once 'models/EmployeeModel.php';

$database = new Database();
$db = $database->getConnection();
$employeeModel = new EmployeeModel($db);

$action = isset($_GET['action']) ? $_GET['action'] : 'dashboard';

switch ($action) {
    case 'dashboard':
        $dashboard = $employeeModel->getDashboardSummary();
        include 'views/dashboard.php';
        break;

    case 'list':
        $employees = $employeeModel->getAllEmployees();
        include 'views/employee_list.php';
        break;

    case 'create':
        if ($_POST) {
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'department' => $_POST['department'],
                'position' => $_POST['position'],
                'salary' => $_POST['salary'],
                'hire_date' => $_POST['hire_date']
            ];
            if ($employeeModel->createEmployee($data)) {
                header("Location: index.php?action=list&message=created");
                exit;
            } else {
                $error = "Gagal menambah karyawan";
            }
        }
        include 'views/employee_form.php';
        break;

    case 'edit':
        $id = $_GET['id'];
        if ($_POST) {
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'department' => $_POST['department'],
                'position' => $_POST['position'],
                'salary' => $_POST['salary'],
                'hire_date' => $_POST['hire_date']
            ];
            if ($employeeModel->updateEmployee($id, $data)) {
                header("Location: index.php?action=list&message=updated");
                exit; // Selalu tambahkan exit setelah header redirect
            } else {
                $error = "Gagal mengupdate karyawan";
            }
        }
        $employee = $employeeModel->getEmployeeById($id);
        include 'views/employee_form.php';
        break;

    case 'delete':
        $id = $_GET['id'];
        if ($employeeModel->deleteEmployee($id)) {
            header("Location: index.php?action=list&message=deleted");
            exit;
        } else {
            header("Location: index.php?action=list&message=delete_error");
            exit;
        }
        break;

    case 'department_stats':
        $stats = $employeeModel->getDepartmentStats();
        include 'views/department_stats.php';
        break;

    case 'refresh':
        $employeeModel->refreshDashboard();
        header("Location: index.php?action=dashboard&message=refreshed");
        exit;
        break;

        case 'tenure_stats':
        $tenure_stats = $employeeModel->getTenureStats();
        include 'views/tenure_stats.php';
        break;

    case 'employee_overview':
        $overview = $employeeModel->getEmployeeOverview();
        include 'views/employee_overview.php';
        break;

        case 'salary_stats':
        $salary_stats = $employeeModel->getSalaryStats();
        include 'views/salary_stats.php';
        break;

    case 'tenure_stats':
        $tenure_stats = $employeeModel->getTenureStats();
        include 'views/tenure_stats.php';
        break;

    case 'employee_overview':
        $overview = $employeeModel->getEmployeeOverview();
        include 'views/employee_overview.php';
        break;

    default:
        $dashboard = $employeeModel->getDashboardSummary();
        include 'views/dashboard.php';
        break;
}
?>