
package clases;


public class Calculadora {
    public static final double PI = 3.1416;
    
    public static int sumar (int a, int b){
        return a + b;
    
    }
    public static double sumar (double a, double b){
        return a + b;
    
    }
    // Sobre carga de metodos
    
    public int restar(int a, int b){
        return a - b;
    }
    public double restar(double a, double b){
        return a - b;
    }
    
}
