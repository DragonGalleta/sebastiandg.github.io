
package test;

import encapsulamiento. *;
public class TestPersona {
    public static void main(String[] args) {
        
        Persona persona1 = new Persona("Sebas", 21, false);
        String estado = persona1.toString();
        System.out.println(estado);
        System.out.println(persona1.getNombre());
        
                persona1.setNombre("Sebastian");
                persona1.setEdad(20);
                System.out.println(persona1.getNombre());
                System.out.println(persona1.getEdad());

                
                System.out.println(persona1);
        
    }
}
