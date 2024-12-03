package clases;

public class Persona {
    public String nombre;
    public int edad;

    public Persona(){
        System.out.println("Construytendo el objeto");
    }
    public Persona(String nombre){
        System.out.println("Hola " + nombre);
    }
    
    public void mostrarDatos() {
        System.out.println("Nombre: " + nombre);
        System.out.println("Edad: " + edad);
    }
}
