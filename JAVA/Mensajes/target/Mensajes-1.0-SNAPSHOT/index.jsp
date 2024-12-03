<%-- 
    Document   : index
    Created on : 27/11/2024, 12:09:41 p. m.
    Author     : drago
--%>

<%@page import="com.oregoom.mensajes.Mensaje"%>
<%@page import="java.util.*"%>
<%@page import="com.oregoom.mensajes.MensajeDao"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    </head>
    <style>

        .div1 {
            margin-top: 100px;

        }
    </style>
    <body>

        <!-- Contenedor que ocupa toda la pantalla -->
        <div class="d-flex justify-content-center align-items-center div1 ">

            <!-- El cuadro de contenido centrado -->

            <div class="modal-dialog" style="max-width: 500px; border: 2px; ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Crear Mensaje</h1>
                    </div>
                    <div class="modal-body">
                        <form action="index.jsp" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Ingrese el mensaje</label>
                                <textarea class="form-control" name="mensaje" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Autor</label>
                                <input type="text" name="autor" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="enviar">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <%
                MensajeDao mensajeDao = new MensajeDao();
                
                if(request.getParameter("enviar") != null){
                Mensaje msj = new Mensaje(
                        request.getParameter("mensaje"), 
                        request.getParameter("autor"));
                
                mensajeDao.insertar(msj);
                }
                
            %>

        </div>

        <div class="modal-dialog" style="max-width: 500px; border: 2px; ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Todos los mensajes</h1>
                </div>
                <%                    
//                    MensajeDao mensajeDao = new MensajeDao();
                    List<Mensaje> mensajes = mensajeDao.seleccionar();
                    Collections.reverse(mensajes);
                    for (Mensaje mensaje : mensajes) {


                %>
                <div class="modal-body">    
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><%=mensaje.getAutor()%></h5>
                            <p class="card-text"><%=mensaje.getMensaje()%></p>
                            <p class="blockquote-footer"><cite><%=mensaje.getFecha()%></cite></p>
                            <a href="editar.jsp?id=<%=mensaje.getId()%>&mensaje=<%=mensaje.getMensaje()%>&autor=<%=mensaje.getAutor()%>"
                            class="card-link">Editar</a>

                            <a href="eliminar.jsp?id=<%=mensaje.getId()%>" class="card-link">Eliminar</a>
                        </div>
                    </div>
                </div>
                <%}%>

            </div>
        </div>  
    </body>
</html>
