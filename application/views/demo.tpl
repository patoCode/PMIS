{config_load file="system.conf"}

 <html>
      <title>{#pageTitle#|default:"No title"}</title>
      <body> <!-- bgcolor="{#bodyBgColor#}" -->
     <table border="{#tableBorderSize#}" bgcolor="{#tableBgColor#}">
         <tr bgcolor="{#rowBgColor#}">
             <td>1</td>
             <td>2</td>
             <td>3</td>
         </tr>
     </table>

    <ul>
        {foreach from=$usuarios item=usuario}
        <li>{$usuario->nombre|upper} {$usuario->username}</li>
        {/foreach}
    </ul>

     </body>
 </html>