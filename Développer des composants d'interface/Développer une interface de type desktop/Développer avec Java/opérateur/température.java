public class température {
    public static void main(String[] args) {
        double f;
        double total;
        int nb1;
        int nb2;
        nb1 = 5;
        nb2 = 9;
        double ss_total;
        ss_total = nb1/nb2;
        System.out.println("Entrez la température en Fahrenheit: ");
        f = Console.lireI();
        total = (5/9)(f-32);
        System.out.println("La température convertie en degré Celsius vaut: " + total);
    }
}
