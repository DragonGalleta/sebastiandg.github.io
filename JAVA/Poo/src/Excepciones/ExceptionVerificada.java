
package Excepciones;

import java.io.*;



public class ExceptionVerificada {
    public static void main(String[] args) throws FileNotFoundException  {
        readFile1();
    }
    public static void readFile1()
        //Lanzar una Excepcion en el metodo
        throws FileNotFoundException {
        File file = new File ("C://file.txt");
        FileReader fr = new FileReader(file);
    }
    
    
}
