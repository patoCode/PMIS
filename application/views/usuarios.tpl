<ul>
        {foreach from=$usuarios item=usuario}
        <li>{$usuario->nombre|upper} {$usuario->username} {$usuario->password}</li>
        {/foreach}
    </ul>