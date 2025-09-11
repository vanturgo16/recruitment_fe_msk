<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Informasi Lamaran</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: #ffffff; border: 1px solid #dddddd; padding: 20px; border-radius: 8px;">
        <h2>Halo, {{ $nameApplied }}</h2>
        <p>
            Terima kasih atas ketertarikan Anda untuk melamar di perusahaan kami.
            <br><small><i>Thank you for your interest in applying to our company.</i></small>
        </p>

        <p>
            Setelah kami melakukan review terhadap lamaran Anda, dengan hormat kami sampaikan bahwa lamaran Anda untuk posisi berikut belum dapat kami terima:
            <br><small><i>After reviewing your application, we regret to inform you that your application for the following position cannot be accepted at this time:</i></small>
        </p>

        <ul>
            <li>Posisi: <strong>{{ $data->position_name }}</strong>
                <br><small><i>Position</i></small>
            </li>
            <li>Departemen: <strong>{{ $data->dept_name }}</strong>
                <br><small><i>Department</i></small>
            </li>
            <li>Syarat Minimum Pendidikan: <strong>{{ $data->min_education }}</strong>
                <br><small><i>Minimum Education Requirement</i></small>
            </li>
            <li>Pendidikan Terakhir Anda: <strong>{{ $maxEduCandidate }}</strong>
                <br><small><i>Your Latest Education</i></small>
            </li>
        </ul>

        <p>
            Keputusan ini diambil karena kualifikasi pendidikan yang dipersyaratkan belum terpenuhi. Namun demikian, kami sangat menghargai usaha dan waktu yang Anda luangkan untuk melamar.
            <br><small><i>This decision was made because the required education qualification was not met. Nevertheless, we truly appreciate the time and effort you put into applying.</i></small>
        </p>

        <p>
            Kami berharap Anda dapat terus mengembangkan diri dan tidak menutup kesempatan untuk melamar kembali pada posisi lain yang sesuai dengan kualifikasi Anda di masa mendatang.
            <br><small><i>We encourage you to continue developing yourself and welcome you to apply again in the future for other positions that match your qualifications.</i></small>
        </p>

        <hr style="margin: 30px 0;">

        <p>
            Salam,<br>
            Tim Rekrutmen Kami
            <br><small><i>Regards, Our Recruitment Team</i></small>
            <br> [Dashboard Recruitment MSK] <br>
        </p>
    </div>
</body>
</html>
