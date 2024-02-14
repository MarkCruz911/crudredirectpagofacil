<!-- redirect-form.blade.php -->
<html>
<head>
    <!-- Aquí puedes agregar cualquier script de JavaScript necesario -->
    <script>
        window.onload = function () {
            document.getElementById('redirectForm').submit();
        }
    </script>
</head>
<body>
    <form id="redirectForm" action="https://checkout.pagofacil.com.bo/es/pay" method="POST">
        <input type="hidden" name="tcParametros" value="{{ $tcParametrosDos }}">
        <input type="hidden" name="tcCommerceID" value="{{ $tcCommerceID }}">
        <!-- Puedes agregar más campos ocultos según tus necesidades -->

        <!-- Puedes agregar un mensaje o indicador aquí si es necesario -->

    </form>
</body>
</html>
