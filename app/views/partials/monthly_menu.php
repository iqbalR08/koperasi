<!DOCTYPE html>
<html>
<head>
    <title>Monthly Menu</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Monthly Menu</h1>
    <table>
        <thead>
            <tr>
                <th>No Agenda</th>
                <th>Tanggal Surat</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($records)) : ?>
                <?php foreach ($records as $record) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($record['No_Agenda']); ?></td>
                        <td><?php echo htmlspecialchars($record['Tanggal_surat']); ?></td>
                        <td><?php echo htmlspecialchars($record['nama']); ?></td>
                        <td><?php echo htmlspecialchars($record['alamat']); ?></td>
                        <td><?php echo htmlspecialchars($record['pendapatan']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5">No records found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
