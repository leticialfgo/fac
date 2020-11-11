@extends('main')

@section('content')

<div class="card">

  <table class="table table-striped">
      <thead>
        <tr> 
          <th><h3>Status da Venda</h3></th>
          <th><h3>Ações</h3></th>
        </tr>
      </thead>

      <tbody>
      @foreach ($vendas as $venda)
          <tr>
            <td><a href="/vendas/{{$venda->id}}">{{ $venda->status }}</a></td>
            <td>
              
              <form method="POST" action="/vendas/{{ $venda->id }}">
                  @csrf
                  @method('delete')
                  <a href="/vendas/{{$venda->id}}/edit"><i class="far fa-edit"></a></i>
                  <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>
              </form>

            </td>
          </tr>  
        @endforeach
      </tbody>
  </table>
</div>

{{ $vendas->appends(request()->query())->links() }}
@endsection