
package com.oregoom.mensajes;

import java.sql.SQLException;
import java.util.List;


public class Main{
    public static void main(String[] args) throws ClassNotFoundException, SQLException {
//        Conexion.getConexion();
//        System.out.println("Conexion exitosa");

//
//    Mensaje msj = new Mensaje("HOla desde Main", "SebasCr");
    MensajeDao mensajeDao = new MensajeDao();
//    int registro = mensajeDao.insertar(msj);
//        System.out.println("Se inserto" + registro + "registro");
//            
//    Mensaje msm = new Mensaje(1,"Hola desde java" , "JavaWeb");
//    int registro = mensajeDao.editar(msm);
//    System.out.println("Se edito" + registro + "registro");

    Mensaje msm = new Mensaje(13,"Editando","Sebas Ed");
    int registro = mensajeDao.editar(msm);
    System.out.println("Se Elimino " + registro + " registro");
    
    List<Mensaje> mensajes = mensajeDao.seleccionar();
        for (Mensaje mensaje: mensajes) {
            System.out.println(mensaje);
        }
        
    }
}
