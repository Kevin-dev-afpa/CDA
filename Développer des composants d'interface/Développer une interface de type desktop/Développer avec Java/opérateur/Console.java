/**
 * @(#)Console.java
 *
 * Saisie de chaine de caractÃ¨res ou de nombre Ã  virgule
 * @patrick Marie 
 * @version 1.00 2010/10/18
 */
import java.io.*; 

public abstract class Console {

	public static byte lireB(){    
		return Byte.valueOf(saisieChaine()).byteValue(); 
    }  
    
	public static char lireC(){    
		return saisieChaine().charAt(0);
		// char result = 0;
		// try {
		// 	result = (char) System.in.read ();
		// } catch (IOException e) {
		// 	e.printStackTrace();
		// }
		// return result;
    }  
    
	public static Double lireD(){    
		return Double.valueOf(saisieChaine()).doubleValue(); 
    }  
    
	public static Float lireF(){    
		return Float.valueOf(saisieChaine()).floatValue(); 
    }
	
	public static int lireI(){    
		return Integer.valueOf(saisieChaine()).intValue(); 
    }
    
	public static Long lireL(){    
		return Long.valueOf(saisieChaine()).longValue(); 
    }
	
	public static Short lireS(){    
		return Short.valueOf(saisieChaine()).shortValue(); 
    }
	
    public static String lireStr(){
    	return saisieChaine();    	
    }  
    	
    private static String saisieChaine(){
    	String chaineDeCaracteres = "" ;
    	InputStreamReader saisie = new InputStreamReader(System.in); 
		BufferedReader entree = new BufferedReader(saisie);
		try{
			chaineDeCaracteres =  entree.readLine();			
		}
		catch(IOException err){ 
		}
		return chaineDeCaracteres;	
    } 
}