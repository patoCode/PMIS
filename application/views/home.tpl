{include file="commons/header.tpl"}

<body>
    Test Template:
    <br>
    Titulo: {$title}
    <br>
    Descripcion: {$description}
    <br>
    <ul>
        {foreach from=$zapatos item=zapato}
        <li>{$zapato.color}</li>
        {/foreach}
    </ul>
    <!-- TEMPLATE -->
    <ul>
        <li>Normal: {$elementos}</li>
        <li>Capitalize: {$elementos|capitalize}</li>
        <li>UPPER: {$elementos|upper:true}</li>
        <li>CONCAT {$elementos|cat:" agregado."}</li>
        <li>Contador: {$elementos|count_characters}</li>
    </ul>
    {$elementos|default:"no title"}
    <br>
    {$myTitle|default:"no title"}
    <br>
    <ul>
        <li>{$number}</li>
        <li>{$number|string_format:"%.2f"}</li>
        <li>{$number|string_format:"%d"}</li>
    </ul>
    FECHA: {$smarty.now|date_format:"%d/%m/%Y %H:%M:%S"} <br>
    {$smarty.const.CONSTANTE}
    {include file="commons/footer.tpl"}