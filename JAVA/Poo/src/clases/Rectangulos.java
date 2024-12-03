
package clases;


public class Rectangulos {
    public int base;
    public int altura;
    
    
    public Rectangulos(){
    
        System.out.println(base);
        System.out.println(altura);
    }
    
    public int area(int b,int a){
        this.base = b;
        this.altura = a;
        return this.base * this.altura;
    }
    public int perimetro(int b,int a){
        this.base = b;
        this.altura = a;
        return 2 * (this.base +   this.altura);
    }
}
