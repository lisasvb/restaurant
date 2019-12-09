<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ABC Server - Factuur</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }
        .gray {
            background-color: lightgray
        }
    </style>

</head>
<body>

<table width="100%">
    <tr>
        <td align="right">
            <h3>Aan Tafel</h3>
            <pre>
                Hadrianussingel 42
                6642 AJ Beuningen Gld
                024 675 05 08

                BTW: NL851234567
                KvK: 12345678
            </pre>
        </td>
    </tr>

</table>



<table width="100%">
    <thead style="background-color: lightgray;">
    <tr>
        <th>#</th>
        <th>Product</th>
        <th>Aantal</th>
        <th>Per stuk (Exclusief BTW)</th>
        <th>Totaal (Exclusief BTW)</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td></td>
        <td align="right"></td>
        <td align="right"></td>
        <td align="right"></td>
    </tr>
    </tbody>

    <tfoot>
    <tr>
        <td colspan="3"></td>
        <td align="right">Subtotaal</td>
        <td align="right"></td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td align="right">BTW (21%)</td>
        <td align="right"></td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td align="right">Totaal (Inclusief BTW)</td>
        <td align="right" class="gray"></td>
    </tr>
    </tfoot>
</table>

</body>
</html>