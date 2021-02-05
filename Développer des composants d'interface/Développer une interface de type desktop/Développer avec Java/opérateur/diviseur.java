public class diviseur
{
    public static void main (String args[])
    {
        int nb1;
        int nb2;
        int total;
        System.out.println("Entrez un premier nombre: ");
        nb1 = Console.lireI();
        System.out.println("Entrez un second nombre: ");
        nb2 = Console.lireI();
        total = nb1 / nb2;
        System.out.println("Votre résultat est de: " + total);
    }
}