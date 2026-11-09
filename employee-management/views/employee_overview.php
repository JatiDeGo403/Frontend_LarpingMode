<?php include 'views/header.php'; ?>
<h2>Ringkasan Keseluruhan Karyawan</h2>

<div class="dashboard-cards" style="margin-top: 2rem;">
    <div class="card" style="border-left: 4px solid #007bff;">
        <h3>Total Karyawan</h3>
        <div class="number"><?php echo $overview['total_employees']; ?></div>
        <p style="color: #666; font-size: 0.85rem; margin-top: 0.5rem;">Seluruh karyawan aktif</p>
    </div>
    
    <div class="card" style="border-left: 4px solid #28a745;">
        <h3>Total Beban Gaji / Bulan</h3>
        <div class="number" style="color: #28a745;">
            Rp <?php echo number_format($overview['total_salary_per_month'], 0, ',', '.'); ?>
        </div>
        <p style="color: #666; font-size: 0.85rem; margin-top: 0.5rem;">Total pengeluaran gaji</p>
    </div>
    
    <div class="card" style="border-left: 4px solid #17a2b8;">
        <h3>Rata-rata Masa Kerja</h3>
        <div class="number" style="color: #17a2b8;">
            <?php echo $overview['avg_tenure_years']; ?> Tahun
        </div>
        <p style="color: #666; font-size: 0.85rem; margin-top: 0.5rem;">Loyalitas rata-rata</p>
    </div>
</div>
<?php include 'views/footer.php'; ?>