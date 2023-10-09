<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Teams</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>All Games</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Home Team</th>
                    <th>Away Team</th>
                    <th> odd </th>
                    <th> Date </th>
                    <th> Prediction </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                    <tr>
                    <td>{{ $homeTeams->where('id', $game->home_team)->first()->name }}</td>
                <td>{{ $awayTeams->where('id', $game->away_team)->first()->name }}</td>
                <td>{{ $game->odd }}</td>
                <td>{{ $date[0] }}</td>
                <td>{{ $pred->where('id', $game->prediction)->first()->prediction }}</td>
                <td>
        </td>
                        <td>
                            <a href="#" class="btn btn-primary mr-2">Edit</a>
                            <form action="{{ route('game.destroy', ['id' => $game->id]) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this game?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>