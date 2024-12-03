<%-- 
    Document   : editar
    Created on : 30/11/2024, 7:09:59 p. m.
    Author     : drago
--%>

<%@page import="com.oregoom.mensajes.Mensaje"%>
<%@page import="com.oregoom.mensajes.MensajeDao"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Editar Mensaje</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"><!-- comment -->
    </head>
    <body>
        <div class="d-flex justify-content-center align-items-center">



            <div class="modal-dialog" style="max-width: 500px; border: 2px; ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Editar Mensaje</h1>
                    </div>
                    <div class="modal-body">
                        <form action="editar.jsp" method="POST">
                            <div class="mb-3">
                                <input type="hidden" name="id" value="<%=request.getParameter("id")%>">

                                <label for="exampleInputEmail1" class="form-label">Ingrese el mensaje</label>
                                <textarea class="form-control" name="mensaje" rows="3"><%=request.getParameter("mensaje")%></textarea>

                            </div>
                            <div class="mb-3">
                                <label>Autor</label>
                                <input type="text" name="autor" class="form-control" value="<%=request.getParameter("autor")%>">
                            </div>
                            <div class="modal-footer">
                                <a href="index.jsp" class="btn btn-danger">Regresar</a>
                                <button type="submit" class="btn btn-primary" name="enviar">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                    <%
                        MensajeDao mensajeDao = new MensajeDao();
                        String id = request.getParameter("id");

                        if (request.getParameter("enviar") != null) {
                            Mensaje msj = new Mensaje(
                                    Integer.parseInt(id.trim()),
                                    request.getParameter("mensaje"),
                                    request.getParameter("autor"));

                            mensajeDao.editar(msj);
                        }

                    %>
                </div>
            </div>
        </div>

    </body>
</html>
