<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>N. Guerra</th>
    </tr>
  </thead>
<tbody>
  @foreach ($pessoa as $pessoas)
    <tr>
      <td>{{ $pessoas->pesid }}</td>
      <td>{{ $pessoas->pesnguerra }}</td>
      <td>Ações</td>
    </tr>
  @endforeach
</tbody>
</table>
