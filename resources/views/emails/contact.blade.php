<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesan Kontak Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 0 0 8px 8px;
        }
        .field {
            margin-bottom: 15px;
        }
        .field-label {
            font-weight: bold;
            color: #495057;
            margin-bottom: 5px;
        }
        .field-value {
            background: white;
            padding: 10px;
            border-radius: 4px;
            border-left: 4px solid #007bff;
        }
        .message-content {
            background: white;
            padding: 15px;
            border-radius: 4px;
            border-left: 4px solid #28a745;
            white-space: pre-wrap;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>📧 Pesan Kontak Baru</h2>
        <p>Anda menerima pesan kontak baru dari website</p>
    </div>
    
    <div class="content">
        <div class="field">
            <div class="field-label">👤 Nama:</div>
            <div class="field-value">{{ $contact->name }}</div>
        </div>
        
        <div class="field">
            <div class="field-label">📧 Email:</div>
            <div class="field-value">{{ $contact->email }}</div>
        </div>
        
        @if($contact->phone)
        <div class="field">
            <div class="field-label">📞 Telepon:</div>
            <div class="field-value">{{ $contact->phone }}</div>
        </div>
        @endif
        
        <div class="field">
            <div class="field-label">📝 Subjek:</div>
            <div class="field-value">{{ $contact->subject }}</div>
        </div>
        
        <div class="field">
            <div class="field-label">💬 Pesan:</div>
            <div class="message-content">{{ $contact->message }}</div>
        </div>
        
        <div class="field">
            <div class="field-label">⏰ Waktu:</div>
            <div class="field-value">{{ $contact->created_at->format('d/m/Y H:i:s') }}</div>
        </div>
    </div>
    
    <div class="footer">
        <p>Pesan ini dikirim otomatis dari sistem website.</p>
        <p>Silakan login ke panel admin untuk melihat dan merespons pesan ini.</p>
    </div>
</body>
</html>
