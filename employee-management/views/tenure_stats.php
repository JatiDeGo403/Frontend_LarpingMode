<?php include 'views/header.php'; ?>
<h2>Statistik Masa Kerja Karyawan</h2>
<p style="color: #666; margin-bottom: 1rem;">Data dikelompokkan berdasarkan: Junior (&lt;1 tahun), Middle (1-3 tahun), Senior (&gt;3 tahun).</p>

<table class="data-table">
    <thead>
        <tr>
            <th>Tingkat Pengalaman (Masa Kerja)</th>
            <th>Jumlah Karyawan</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $tenure_stats->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td>
                <span style="padding: 0.25rem 0.75rem; background: #e9ecef; border-radius: 4px; font-weight: bold;">
                    <?php echo htmlspecialchars($row['experience_level']); ?>
                </span>
            </td>
            <td><strong><?php echo $row['total_employees']; ?> Orang</strong></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php include 'views/footer.php'; ?>