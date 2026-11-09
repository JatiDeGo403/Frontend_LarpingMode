// TUGAS 1.1: Statistik Gaji
    public function getSalaryStats() {
        $query = "SELECT department, 
                         ROUND(AVG(salary), 2) as avg_salary, 
                         MAX(salary) as max_salary, 
                         MIN(salary) as min_salary 
                  FROM " . $this->table_name . " 
                  GROUP BY department 
                  ORDER BY department ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // TUGAS 1.2: Masa Kerja
    public function getTenureStats() {
        $query = "SELECT 
                    CASE 
                        WHEN EXTRACT(YEAR FROM AGE(CURRENT_DATE, hire_date)) > 3 THEN 'Senior (>3 Tahun)'
                        WHEN EXTRACT(YEAR FROM AGE(CURRENT_DATE, hire_date)) >= 1 THEN 'Middle (1-3 Tahun)'
                        ELSE 'Junior (<1 Tahun)'
                    END as experience_level,
                    COUNT(*) as total_employees
                  FROM " . $this->table_name . "
                  GROUP BY 
                    CASE 
                        WHEN EXTRACT(YEAR FROM AGE(CURRENT_DATE, hire_date)) > 3 THEN 'Senior (>3 Tahun)'
                        WHEN EXTRACT(YEAR FROM AGE(CURRENT_DATE, hire_date)) >= 1 THEN 'Middle (1-3 Tahun)'
                        ELSE 'Junior (<1 Tahun)'
                    END
                  ORDER BY total_employees DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // TUGAS 1.3: Ringkasan Karyawan
    public function getEmployeeOverview() {
        $query = "SELECT 
                    COUNT(*) as total_employees,
                    SUM(salary) as total_salary_per_month,
                    ROUND(AVG(EXTRACT(YEAR FROM AGE(CURRENT_DATE, hire_date))), 1) as avg_tenure_years
                  FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }