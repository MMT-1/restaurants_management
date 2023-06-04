<h1>Reservations for </h1>

<table>
  <thead>
    <tr>
      <th>Date</th>
      <th>Time</th>
      <th>Guests</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($reservation as $reservation)
      <tr>
        <td>{{ $reservation->date }}</td>
        <td>{{ $reservation->time }}</td>
        <td>{{ $reservation->guests }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
