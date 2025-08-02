<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Travel Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .ticket {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
        }
        .ticket-header {
            background-color: #1e3a8a;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .ticket-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .ticket-body {
            padding: 20px;
        }
        .ticket-info {
            margin-bottom: 20px;
        }
        .ticket-info h2 {
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-top: 0;
            color: #1e3a8a;
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: bold;
            width: 150px;
        }
        .info-value {
            flex: 1;
        }
        .ticket-footer {
            background-color: #f9f9f9;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            border-top: 1px solid #eee;
        }
        .barcode {
            text-align: center;
            margin: 20px 0;
        }
        .barcode img {
            max-width: 300px;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 150px;
        }
        .ticket-id {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="ticket-header">
            <h1>TravelConneckt - Travel Ticket</h1>
        </div>
        
        <div class="ticket-body">
            <div class="logo">
                <!-- Logo placeholder -->
                <h2>TravelConneckt</h2>
            </div>
            
            <div class="ticket-id">
                Ticket #{{ $reservation->id }}
            </div>
            
            <div class="ticket-info">
                <h2>Trip Details</h2>
                
                <div class="info-row">
                    <div class="info-label">From:</div>
                    <div class="info-value">{{ $reservation->trajet->departure }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">To:</div>
                    <div class="info-value">{{ $reservation->trajet->arrival }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Departure Date:</div>
                    <div class="info-value">{{ $reservation->trajet->departure_date }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Agency:</div>
                    <div class="info-value">{{ $reservation->trajet->agency->name }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Class:</div>
                    <div class="info-value">{{ $reservation->trajet->category->name }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Price:</div>
                    <div class="info-value">{{ $reservation->trajet->price }} FCFA</div>
                </div>
            </div>
            
            <div class="ticket-info">
                <h2>Passenger Information</h2>
                
                <div class="info-row">
                    <div class="info-label">Name:</div>
                    <div class="info-value">{{ $user->name }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Email:</div>
                    <div class="info-value">{{ $user->email }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Booking Date:</div>
                    <div class="info-value">{{ $reservation->created_at->format('M d, Y') }}</div>
                </div>
            </div>
            
            <div class="barcode">
                <!-- Barcode placeholder -->
                <div style="font-family: monospace; letter-spacing: 2px; font-size: 16px; padding: 10px; background: #f0f0f0; display: inline-block;">
                    TKT{{ str_pad($reservation->id, 8, '0', STR_PAD_LEFT) }}
                </div>
            </div>
        </div>
        
        <div class="ticket-footer">
            <p>This ticket is valid for the specified journey only. Please arrive at least 30 minutes before departure.</p>
            <p>For any inquiries, please contact TravelConneckt customer service.</p>
            <p>&copy; {{ date('Y') }} TravelConneckt. All rights reserved.</p>
        </div>
    </div>
</body>
</html>