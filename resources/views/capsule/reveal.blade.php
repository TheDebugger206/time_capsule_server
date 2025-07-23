<!DOCTYPE html>
<html>
<head>
    <title>Your Time Capsule Has Been Revealed</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">
    <h2>Hello {{ $capsule->user->first_name }},</h2>

    <p>The moment has arrived! Your time capsule titled <strong>"{{ $capsule->title }}"</strong> has just been revealed.</p>

    <p>We hope this brings back wonderful memories, reflections, or even a smile. You created this capsule on <strong>{{ \Carbon\Carbon::parse($capsule->created_at)->format('F j, Y') }}</strong>, and now it’s ready to be opened — just for you.</p>

    <p>Click the link below to view your capsule and revisit what you once stored for your future self:</p>

    <p><a href="{{ url('/capsules/' . $capsule->id) }}" style="color: #1a73e8;">View My Capsule</a></p>

    @if($capsule->message)
        <hr>
        <h4>Your Original Message:</h4>
        <blockquote style="font-style: italic; color: #555;">{{ $capsule->message }}</blockquote>
    @endif

    <br>
    <p>With warmth,<br>
    The DearMe Team</p>
</body>
</html>
