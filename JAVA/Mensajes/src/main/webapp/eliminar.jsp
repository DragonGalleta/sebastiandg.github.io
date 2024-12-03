<%-- 
    Document   : eliminar
    Created on : 3/12/2024, 12:34:18 p. m.
    Author     : drago
--%>

<%@page import="com.oregoom.mensajes.Mensaje"%>
<%@page import="com.oregoom.mensajes.MensajeDao"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <input type="hidden" name="id" value="<%=request.getParameter("id")%>">
                    <%
                        String id = request.getParameter("id");
                        Mensaje msj = new Mensaje(Integer.valueOf(id));
                        MensajeDao mensajeDao = new MensajeDao();
                        mensajeDao.eliminar(msj);
                        request.getRequestDispatcher("index.jsp").forward(request, response);
              
                    %>
                    <a href="index.jsp" class="btn btn-danger">Regresar</a>

       
    </body>
</html>
