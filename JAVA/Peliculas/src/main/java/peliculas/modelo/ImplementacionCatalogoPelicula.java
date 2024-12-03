
package peliculas.modelo;

import java.util.ArrayList;
import javax.swing.JOptionPane;


public class ImplementacionCatalogoPelicula implements ICatalogoPeliculas{

    private final ArrayList<String> listaPeliculas;

    public ImplementacionCatalogoPelicula() {
        this.listaPeliculas = new ArrayList<>();
    }
    
    
    
    @Override
    public void insertarPelicula(Pelicula nombrePelicula) {
        
        this.listaPeliculas.add(nombrePelicula.toString());
        
    }

    @Override
    public void listarPelicula() {
        JOptionPane.showMessageDialog(null,
                this.listaPeliculas,
                "Lista de Peliculas",
                JOptionPane.INFORMATION_MESSAGE);
    }

    @Override
    public void buscarPelicula(String nombrePelicula) {
        String resultado = null;
        for(var pelicula: this.listaPeliculas){
            if(pelicula.equals(nombrePelicula)){
                resultado = pelicula;
            break;
        }else{
                resultado = pelicula;
                }
            }
            if(nombrePelicula.equals(resultado)){
                JOptionPane.showMessageDialog(null, "Resultado -> " + resultado,
                        "Buscar Pelicula",
                        JOptionPane.QUESTION_MESSAGE);
                
            }else{
                JOptionPane.showMessageDialog(
                        null,
                        "No se encontro la pelicula ->" + nombrePelicula,
                        "Buscar Pelicula",
                        JOptionPane.WARNING_MESSAGE);
                
            }
        
    }
    
}
