package persistenciadatos;

import java.io.*;
import java.nio.Buffer;
import java.util.logging.Level;
import java.util.logging.Logger;

public class ManejoArchivos {

    public static void crearArchivo(String nombreArchivo) {

        PrintWriter salida = null;
        try {
            File archivo = new File(nombreArchivo);
            salida = new PrintWriter(archivo);
            System.out.println("Se creo el archivo");
        } catch (FileNotFoundException ex) {
            ex.printStackTrace(System.out);
        } finally {
            salida.close();
        }
    }

    public static void escribirArchivo(String nombreArchivo, String contenido) {
        File archivo = new File(nombreArchivo);

        PrintWriter salida = null;
        try {
            salida = new PrintWriter(new FileWriter(archivo, true));

            salida.println(contenido);
            System.out.println("Se escribio en el archivo");
        } catch (FileNotFoundException ex) {
            ex.printStackTrace(System.out);
        } catch (IOException ex) {
            ex.printStackTrace(System.out);

        } finally {
            salida.close();
        }
    }

    public static void LeerArchivo(String nombreArchivo) {
        File archivo = new File(nombreArchivo);

        
        try {
            BufferedReader entrada = new BufferedReader(new FileReader(archivo));
            String lectura = entrada.readLine();
            System.out.println(lectura);
            while (lectura != null) {                
            System.out.println(lectura);
            lectura = entrada.readLine();
            }
            entrada.close();
        } catch (FileNotFoundException ex) {
            ex.printStackTrace(System.out);
        } catch (IOException ex) {
            ex.printStackTrace(System.out);

        } 
    }
        public static void EliminarArchivo(String nombreArchivo) {
        File archivo = new File(nombreArchivo);

        archivo.delete();
            System.out.println("Se elimino el archivo");

    }
}
