package test;
import Herencia.*;
import java.util.Date;

public class TestHerencia {
    public static void main(String[] args) {
        

        
       Empleados empleado1 = new Empleados(3000, "Seb");
        imprimer(empleado1);
        

        
        var fecha = new Date();
        Clientes cliente1 = new Clientes(fecha, true, "Seb", "M", 25, "Mari");
        imprimer(cliente1);
        
        String nombre = "Alex";
        determinarTipo(nombre);
        
        //Conversion de Objetos
        // Downcasting
        Persona persona = new Empleados(300, "Sebas");
        Empleados empleado = (Empleados) persona;
        empleado.getSueldo();
        System.out.println(empleado.obtenerDetalle());
        // Upcasting
        Persona persona2 = empleado;
        System.out.println(persona2.obtenerDetalle());
        
        Persona p1 = new Persona("Sebas", "M", 10, "cera");
        Persona p2 = new Persona("Sebas", "M", 10, "cera");
        
        System.out.println(p2.equals(p1));
        
        System.out.println(p1.hashCode());
        System.out.println(p2.hashCode());
        
        if (p1.hashCode() == p2.hashCode()) {
            System.out.println("Son iguales");
        }else{
            System.out.println("No son iguales");
        }
        
    }
    public static void imprimer(Persona persona){
        System.out.println(persona.obtenerDetalle());
    }
    public static void determinarTipo(Object objeto) {
        if(objeto instanceof Empleados){
            System.out.println("Es tipo Empleado");
        }else if(objeto instanceof Clientes){
            System.out.println("Es tipo Cliente");
        }else if (objeto instanceof Persona){
            System.out.println("Es Tipo persona");
        }else if(objeto instanceof Object){
            System.out.println("es de tipo object");
        }
    }
}
