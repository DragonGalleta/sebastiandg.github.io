package Excepciones;

import java.util.*;

public class TestExcepcion {

    public static void main(String[] args) {
        Scanner leer = new Scanner(System.in);
        boolean continuarEjecucion = true;
        do {
            try {
                
                System.out.println("Ingrese N1");
                int n1 = leer.nextInt();
                System.out.println("Ingrese N2");
                int n2 = leer.nextInt();

                int resultado = dividir(n1, n2);

                System.out.println(resultado);

                continuarEjecucion = false;

            } catch (InputMismatchException e) {
                System.err.println("Ocurrio un error: Ingrese solo numeros enteros");
                //e.printStackTrace(System.err);
                leer.nextLine();
            } catch (OperadorExcepcion e) {
                System.err.println("Error " + e.getMessage());
            } catch (Exception e) {
                e.printStackTrace(System.err);
            } finally {
                System.out.println("Se reviso la division");
            }
        } while (continuarEjecucion);

    }
    
    
    static int dividir(int n, int d){
    
    if (d==0){
     throw new OperadorExcepcion("Divicion entre cero"); 
    }
    return n / d;
    }
}
