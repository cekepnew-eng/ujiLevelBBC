<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru dari Kontak Bakso Bunderan Ciomas</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #8B0000 0%, #DAA520 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }
        .header p {
            margin: 10px 0 0 0;
            font-size: 16px;
            opacity: 0.9;
        }
        .content {
            padding: 40px 30px;
        }
        .info-box {
            background-color: #f8f9fa;
            border-left: 4px solid #8B0000;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .info-box h3 {
            margin: 0 0 15px 0;
            color: #8B0000;
            font-size: 18px;
        }
        .info-item {
            margin: 10px 0;
            display: flex;
            align-items: flex-start;
        }
        .info-label {
            font-weight: 600;
            min-width: 120px;
            color: #555;
        }
        .info-value {
            flex: 1;
            color: #333;
        }
        .message-box {
            background-color: #fff;
            border: 1px solid #e9ecef;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
            white-space: pre-wrap;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
        .footer p {
            margin: 5px 0;
            color: #666;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            background-color: #8B0000;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            margin: 10px 5px;
        }
        .btn:hover {
            background-color: #660000;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">🍜 Bakso Bunderan Ciomas</div>
            <h1>Pesan Baru dari Form Kontak</h1>
            <p>{{ $date }}</p>
        </div>

        <div class="content">
            <div class="info-box">
                <h3>📝 Informasi Pengirim</h3>
                
                <div class="info-item">
                    <span class="info-label">👤 Nama:</span>
                    <span class="info-value">{{ $name }}</span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">📧 Email:</span>
                    <span class="info-value">{{ $email }}</span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">📱 WhatsApp:</span>
                    <span class="info-value">{{ $phone }}</span>
                </div>
            </div>

            <div class="info-box">
                <h3>💬 Isi Pesan</h3>
                <div class="message-box">{{ $message }}</div>
            </div>

            <div style="text-align: center; margin: 30px 0;">
                <a href="mailto:{{ $email }}" class="btn">📧 Balas Email</a>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $phone) }}" class="btn" style="background-color: #25D366;">💬 WhatsApp</a>
            </div>
        </div>

        <div class="footer">
            <p><strong>Bakso Bunderan Ciomas</strong></p>
            <p>Jl. Raya Ciomas No. 45, Kec. Ciomas, Kab. Bogor, Jawa Barat 16610</p>
            <p>📞 0812-1234-5678 | ⏰ 09:00 - 22:00 WIB</p>
            <p style="margin-top: 15px; font-size: 12px; color: #999;">
                Email ini dikirim otomatis dari form kontak website Bakso Bunderan Ciomas
            </p>
        </div>
    </div>
</body>
</html>
