# Prova PHP
### * Desenvolvido sobre Laravel 5.6.

## COMO EXECUTAR O PROJETO:
- Clone o projeto em sua máquina.  
- Abra o prompt e execute o comando no diretório do projeto:
> `npm install`
- Após conclusão, execute o comando:
> `composer install`
- Crie um banco de dados MySQL com o nome *System_Test*.  
> (se necessário, altere o usuário/senha no arquivo .env para os que você utiliza na máquina)
- Para adicionar os dados padrões no banco de dados, execute:
> `php artisan migrate --seed`
- Por fim, execute o projeto com o comando:
> `'php artisan serve'`
- Abra o navegador e acesse o endereço gerado no comando acima.  
_Normalmente localhost:8000_  

  Obs.: Caso ocorra erro **No Application Key Has Been Specified**,execute o comando no prompt:
    >`php artisan key:generate`

## SOBRE OS USUÁRIOS:
- Há 4 roles possíveis:
  1. **Administrator**: Tem permissão para visualizar, cadastrar, editar e excluir qualquer cadastro.
  2. **Editor**: Tem permissão para visualizar e editar qualquer cadastro (exceto cargos).
  3. **Moderator**: Tem permissão para visualizar e editar qualquer cadastro (exceto cargos).
  4. **User**: Tem permissão apenas para visualizar.

- No seed há 4 usuários pré-definidos:

Usuário     | Role        | login             |   senha 
---------   | ------      | ------            | ------  
Carlos      |Administrator|carlos@email.com   |123456   
Edgar       |Editor       |edgar@email.com    |123456
Luana       |Moderator    |luana@email.com    |123456
Bruno       |User         |bruno@email.com    |123456
  
## CONFIGURAÇÕES DE ROLES:

Para utilização de roles, foram adicionadas algumas informações no arquivo:
> App > Http > Providers > AuthServiceProvider.php

- No Cabeçalho foi informado um alias para o Gate:  
`use Illuminate\Support\Facades\Gate as GateContract;`

- Foi feita também alteração na **function boot** definindo os roles:
```
public function boot (GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate::define('isAdmin', function($user){
            return $user->cargo == 'Administrator';
        });
        
        $gate::define('isEditor', function($user){
            return $user->cargo == 'Editor';
        });

        $gate::define('isModerator', function($user){
            return $user->cargo == 'Moderator';
        });
        
        $gate::define('isUser', function($user){
            return $user->cargo == 'User';
        });
    }
```
- Nas Views, foi utilizado o facade _@can()_ e _@endcan_ para determinar o que cada role pode visualizar:
```
<td class="align-middle">
  @can('isAdmin')
    <a class="btn btn-warning btn-sm"  href="/users/{{$user->id}}/editar">Editar</a>
    <a class="btn btn-danger btn-sm"   href="/users/{{$user->id}}/excluir">Excluir</a>
  @endcan
  
  @can('isModerator')
    <a class="btn btn-warning btn-sm"  href="/users/{{$user->id}}/editar">Editar</a>
  @endcan

  @can('isEditor')
    <a class="btn btn-warning btn-sm"  href="/users/{{$user->id}}/editar">Editar</a>
  @endcan
</td>
```