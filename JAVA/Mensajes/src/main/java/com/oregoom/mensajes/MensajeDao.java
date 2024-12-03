package com.oregoom.mensajes;

import java.sql.*;
import java.util.*;

import static com.oregoom.mensajes.Conexion.*;

public class MensajeDao {

    private Connection con = null;
    private PreparedStatement ps = null;
    private ResultSet rs = null;
    private Mensaje mensaje;

    public List<Mensaje> seleccionar() throws ClassNotFoundException {
        String sql = "SELECT * FROM mensajes";
        List<Mensaje> mensajes = new ArrayList<>();
        try {
            this.con = getConexion();
            this.ps = this.con.prepareStatement(sql);
            this.rs = this.ps.executeQuery();
            while (this.rs.next()) {
                int id = this.rs.getInt("id_mensaje");
                String msj = this.rs.getString("mensaje");
                String autor = this.rs.getString("autor");
                String Date = this.rs.getString("fecha");

                this.mensaje = new Mensaje(id, msj, autor, Date);
                mensajes.add(mensaje);

            }
        } catch (SQLException ex) {
            ex.printStackTrace(System.out);
        } finally {
            try {
                cerrar(this.rs);
                cerrar(this.ps);
                cerrar(this.con);
            } catch (SQLException ex) {
                ex.printStackTrace(System.out);

            }

        }
        return mensajes;
    }

    public int insertar(Mensaje mensaje) throws ClassNotFoundException{
        String sql = "INSERT INTO mensajes (mensaje, autor, fecha)VALUES (?,?,CURRENT_TIME());";
        

        int registros = 0;
        
        try {
            this.con = getConexion();
            this.ps = this.con.prepareStatement(sql);
            

            this.ps.setString(1, mensaje.getMensaje());
            this.ps.setString(2, mensaje.getAutor());
            registros = this.ps.executeUpdate();
        } catch (SQLException ex) {
            ex.printStackTrace(System.out);
        } finally {
            try {
                
                cerrar(this.ps);
                cerrar(this.con);
            } catch (SQLException ex) {
                ex.printStackTrace(System.out);

            }

        }
        return registros;
    }
    public int editar(Mensaje mensaje) throws ClassNotFoundException{
        String sql = "UPDATE mensajes SET mensaje=?, autor=? WHERE id_mensaje=?";
        

        int registros = 0;
        
        try {
            this.con = getConexion();
            
            this.ps = this.con.prepareStatement(sql);

            this.ps.setString(1, mensaje.getMensaje());
            this.ps.setString(2, mensaje.getAutor());
            this.ps.setInt(3, mensaje.getId());
            registros = this.ps.executeUpdate();
        } catch (SQLException ex) {
            ex.printStackTrace(System.out);
        } finally {
            try {
                
                cerrar(this.ps);
                cerrar(this.con);
            } catch (SQLException ex) {
                ex.printStackTrace(System.out);

            }

        }
        return registros;
    }
    
        public int eliminar(Mensaje mensaje) throws ClassNotFoundException{
        String sql = "DELETE FROM mensajes WHERE id_mensaje = ?";
        

        int registros = 0;
        
        try {
            this.con = getConexion();
            this.ps = this.con.prepareStatement(sql);
            
            this.ps.setInt(1, mensaje.getId());
            registros = this.ps.executeUpdate();
        } catch (SQLException ex) {
            ex.printStackTrace(System.out);
        } finally {
            try {
                
                cerrar(this.ps);
                cerrar(this.con);
            } catch (SQLException ex) {
                ex.printStackTrace(System.out);

            }

        }
        return registros;
    }
}

