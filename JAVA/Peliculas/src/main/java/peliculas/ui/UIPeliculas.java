package peliculas.ui;

import javax.swing.JOptionPane;
import peliculas.modelo.*;

public class UIPeliculas {

    public static void InterfazUsuario() {
        ICatalogoPeliculas peliculas = new ImplementacionCatalogoPelicula();
        Pelicula pelicula;

        CERRAR:
        while (true) {
            String Opcion = JOptionPane.showInputDialog(null,
                    "1 - Insertar Pelicula\n"
                    + " 2 - Listar pelicula\n"
                    + " 3 - Buscar Pelicula\n"
                    + " 4 - Salir\n",
                    "Ingrese una opcion",
                    3
            );

            int opcionInt = 0;
            try {
                opcionInt = Integer.parseInt(Opcion);
            } catch (NumberFormatException e) {
                JOptionPane.showMessageDialog(null,
                            "Opcion Incorrecta\n"
                            +"Las opciones tienen que ser numeros enteros",
                            "Error",
                            JOptionPane.ERROR_MESSAGE);
            }

            switch (opcionInt) {
                case 1:
                    String nombrePelicula = JOptionPane.showInputDialog(null,
                            "INGRESE EL NOMBRE DE LA PELICULA",
                            "Entrada",
                            3);
                    pelicula = new Pelicula(nombrePelicula);
                    peliculas.insertarPelicula(pelicula);
                    break;
                case 2:
                    peliculas.listarPelicula();
                    break;
                case 3:
                    nombrePelicula = JOptionPane.showInputDialog(null,
                            "Ingrese la Pelicula",
                            "Ingrese",
                            3);
                    peliculas.buscarPelicula(nombrePelicula);
                    break;
                case 4:
                    break CERRAR;
                default:
                    JOptionPane.showMessageDialog(null, "Opcion Incorrecta\n"
                            + "Vuelve a ingresar una \n"
                            + "Opccion Correcta\n"
                            + "Las opciones son de 1 a 4",
                            "Error",
                            JOptionPane.ERROR_MESSAGE);
            }
        }
    }

}
