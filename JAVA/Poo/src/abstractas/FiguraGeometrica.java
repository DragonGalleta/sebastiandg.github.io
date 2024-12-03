
package abstractas;


public abstract class FiguraGeometrica {
    protected String tipoFigura;
    
    protected FiguraGeometrica(String TipoFigura){
        this.tipoFigura = TipoFigura;
    }
    
    
    public abstract void dibujar();

    public String getTipoFigura() {
        return tipoFigura;
    }

    public void setTipoFigura(String tipoFigura) {
        this.tipoFigura = tipoFigura;
    }

    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        sb.append("FiguraGeometrica{");
        sb.append("tipoFigura=").append(tipoFigura);
        sb.append('}');
        return sb.toString();
    }


    
    
}
