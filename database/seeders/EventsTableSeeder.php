<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('events')->delete();
        
        \DB::table('events')->insert(array (
            0 => 
            array (
                'message' => '',
                'header' => 'Zahrnutie objektu jednej triedy v objekte inej triedy sa v objektovo-orientovanom programovaní označuje ako',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'message' => '',
                'header' => 'V objektovo-orientovanom programe hlavná funkcionalitatypicky',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'message' => '',
                'header' => 'Konštruktor v Jave',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'message' => '',
                'header' => 'Objekt v objektovo-orientovanom programovaní predstavuje',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'message' => '<pre>package abc.xyz;</pre>',
                'header' => 'V programe v Jave príkaz',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'message' => '',
            'header' => 'Tok údajov (stream) v Java API sa obaľuje, aby',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'message' => '<pre>import java.util.∗;</pre>',
                'header' => 'Príkaz',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'message' => '',
            'header' => 'Tok údajov (stream) v Java API sa otvára',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'message' => '',
                'header' => 'Explicitne vytvorený konštruktor triedy v konštruktore odvodenej triedy v Jave',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'message' => '<pre>public class A {
private int i;
public void m(int i) {this.i = i;}
}
</pre>
Daný je objekt o triedy A. Príkaz:
<pre>o.m(5); </pre>',
                'header' => 'Daná je trieda',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'message' => '',
                'header' => 'Agregácia v objektovo-orientovanom programovaní',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'message' => '',
                'header' => 'Abstraktná trieda v Jave',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'message' => '',
                'header' => 'V objektovo-orientovanom programe hlavná funkcionalita typicky',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'message' => '<pre>public class A {
public void f() {
System.out.print("A");
}
public void af() {
System.out.print("Af");
}
}
public class B extends A {
public void f() {
System.out.print("B");
}
public void bf() {
System.out.print("Bf");
}
}
</pre>
Potom tento kód:
<pre>A a = new B();
B b = new B();
a.f();
a.af();
((B)a).bf();
(new B()).f();
(new B()).bf();
(new B()).af();
</pre>
vypíše:',
            'header' => 'Daný je nasledujúci kód v Jave (každá trieda vo vlastnom súbore):',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'message' => '<pre>public class A {
private A() {}
private static A a = new A();
public static A m() {
return a;
}
public void f() {
System.out.println("OK");
}
}
</pre>
Výpis hlásenia „OK“ z inej triedy možno dosiahnuť',
                'header' => 'Daný je nasledujúci kód v Jave:',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'message' => '',
                'header' => 'Je dobré z hľadiska objektovo-orientovaného prístupu rozsiahle používanie statických metód?',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
            'message' => '<pre>List a = new ArrayList();</pre>
predstavuje:',
                'header' => 'Daný je kód v Jave:',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'message' => '',
                'header' => 'Uplatnenie objektu namiesto objektu typu, od ktorého je odvodený, je možné vďaka',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'message' => '',
                'header' => 'Zmeniť stav objektu znamená',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'message' => '<pre>import java.io.∗;</pre>',
                'header' => 'Ak potrebujeme pracovať s V/V systémom Javy, príkaz',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'message' => '<pre>public interface P {
void m(N d);
}
public interface N {
void op(A e);
void op(B e);
}
public class A implements P {
...
public void m(N d) {
d.op(this);
}
}
public class B implements P {
...
public void m(N d){
d.op(this);
}
}
public class X implements N {
public void op(A e) {...}
public void op(B e) {...}
}
public class Y implements N {
public void op(A e) {...}
public void op(B e) {...}
}</pre>',
            'header' => 'Pre ktorý návrhový vzor je tento kód charakteristický (každá trieda a rozhranie vo vlastnom súbore)?',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'message' => '',
                'header' => 'Zachytenú výnimku v Jave je možné',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'message' => '<pre>public class A {
public static int f(int i) {
return 2 ∗ i;
}
public static void main(String[] args) {
int[] a = new int[f(5)];
}
}</pre>',
                'header' => 'Pokus o preklad a vykonanie nasledujúcej triedy v Jave:',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'message' => '',
                'header' => 'Návrhový vzor Strategy je vhodné použiť na',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'message' => '',
                'header' => 'Prístup protected je vhodné použiť pri takých prvkoch triedy, ku ktorým chceme pristupovať len',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'message' => '',
                'header' => 'Balíky v Jave sa definujú',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'message' => '',
            'header' => 'Prúd údajov (stream) v Java API sa otvára',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
            'message' => 'X[] a = new X [new C().m()];',
            'header' => 'To, že sa v Jave veľkosť poľa dá zadať aj takto (ak metóda m() vracia int)',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'message' => '<pre>public interface K {
void m(L o);
}
public interface L {
void f(C e);
void f(D e);
}
public class C implements K {
...
public void m(L o) {
o.f(this);
}
}
public class D implements K {
...
public void m(L o){
o.f(this);
}
}
public class M implements L {
public void f(C e) {
...
}
public void f(D e) {
...
}
}
public class N implements L {
public void f(C e) {
...
}
public void f(D e) {
...
}
}</pre>',
            'header' => 'Ktorý návrhový vzor implementuje tento kód v Jave (každá trieda a rozhranie vo vlastnom súbore)?',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'message' => ' Používateľ tento výpočet nakoniec spúšťa kliknutím na tlačidlo v používateľskom rozhraní realizovanom v rámci Swing. Samotný výpočet by z hľadiska objekovoorientovaného návrhu bolo najlepšie realizovať',
                'header' => 'Okrem iného, program zabezpečuje výpočet podľa určitého vzorca.',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'message' => '',
                'header' => 'Dá sa v Jave urobiť inštancia rozhrania?',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'message' => '',
                'header' => 'V rámci Swing sa kliknutie na tlačidlo v okne sleduje',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'message' => '',
                'header' => 'Synchronizácia nestatickej metódy',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'message' => '',
                'header' => 'Inštancia rozhrania v Jave',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'message' => '',
                'header' => 'Rozhranie v Jave definuje',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'message' => '',
                'header' => 'V triede, ktorá dedí od rozhrania je možné zadefinovať',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'message' => '<pre>interface Abc {
void m();
}</pre>Z pohľadu prekladu v nasledujúcom kóde
<pre>Abc o;
o = new Abc();
o.m();</pre>',
                'header' => 'Dané je rozhranie:',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'message' => '',
                'header' => 'V triede, ktorá implementuje rozhranie, je možné zadefinovať',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'message' => '<pre>class C implements Serializable {
String[] s = new String[9999];
}</pre>
Dané sú inštancie triedy C:
<pre>C a = new C();
C b = new C();
C c = new C();</pre>
Serializovať tieto inštancie naraz (jedným zápisom do jedného súboru)',
                'header' => 'Daná je trieda',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
            'message' => '<pre>List<Z> z = new LinkedList<>();
z.add(new X());
z.add(new Y());
</pre>
Aby sa tento kód mohol preložiť a vykonať',
                'header' => 'Daný je nasledujúci kód:',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'message' => '<pre>public class A {
void m(int i) { }
void m(int i, int j) { }
}
public class B extends A {
void n(int i) { }
void m(int i, int j) { }
}</pre>',
                'header' => 'Daný je nasledujúci kód v Jave:',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'message' => '<pre>class Utvar {
int farba = 12;
void nakresli() { }
}
class Kruh extends Utvar {
void nakresli(int f) {
System.out.println("Kruh farby " + f) ;
}
}</pre>
Potom kód: 
<pre>Kruh k = new Kruh();
k.nakresli();</pre>',
                'header' => 'Daný je nasledujúci kód v Jave:',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'message' => '',
                'header' => 'Pomocou kľúčového slova super sa v Jave dá zavolať',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'message' => '',
            'header' => 'Zavedenie (import) viacerých balíkov v Jave môže spôsobiť',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'message' => '',
                'header' => 'Atribút triedy, ktorému predchádza kľúčové slovo private',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'message' => '',
                'header' => 'Import balíka do programu v Jave',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'message' => '',
                'header' => 'Niť v Jave vzniká',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'message' => '',
                'header' => 'Vyhodenie výnimky v Jave',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'message' => '<pre>class MyException extends Exception {}
class A {
void m() throws MyException {
...
}
}
class B {
void m() {
new A().m();
}
}</pre>
Metóda m() triedy B',
                'header' => 'Daný je nasledujúci kód:',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'message' => '',
                'header' => 'Spracovanie výnimky v Jave sa realizuje',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'message' => '',
                'header' => 'Anonymné triedy, odkazy na metódy a lambda výrazy sa v Jave používajú na',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'message' => '<pre>class A {
void a() throws XException {
if(...) {...}
else throw new XException();
}
}
class B {
void b() throws XException {new A().a();}
}</pre>
Metóda b() triedy B',
                'header' => 'Daný je nasledujúci kód:',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            52 => 
            array (
                'message' => '',
                'header' => 'Synchronizované metódy v Jave',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            53 => 
            array (
                'message' => '<pre>class MyException extends Exception {}
class A {
void a(int i) throws MyException {
if(i > 0) {
...
} else throw new MyException() ;
}
}
class B {
void b(int i) {
new A().a(i);
}
}</pre>
Metóda b() triedy B',
                'header' => 'Daný je nasledujúci kód v Jave:',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            54 => 
            array (
                'message' => '',
                'header' => 'Iterátory v Java API uľahčujú',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            55 => 
            array (
                'message' => '<pre>public abstract class T {
abstract void a();
void b() {...};
}</pre>
Inštancia tejto triedy sa',
                'header' => 'Daná je trieda:',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            56 => 
            array (
                'message' => '',
                'header' => 'Rozšírená slučka for v Jave pri aplikácii na zoskupenie',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            57 => 
            array (
                'message' => '',
                'header' => 'Porušenie Liskovej princípu substitúcie spôsobí',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            58 => 
            array (
                'message' => '',
                'header' => 'Dá sa urobiť inštancia abstraktnej triedy?',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            59 => 
            array (
                'message' => '<pre>1 abstract class A { }
2 interface I { }
3 A[] a = new A[5];
4 I[] i = new I[5];</pre>
Tento kód sa',
                'header' => 'Daný je nasledujúci kód:',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            60 => 
            array (
            'message' => '<pre>for (Object o : l) {
if (o.class == Frog.class)
((Frog)o).jump();
else if (o.class == Bird.class)
((Bird)o).fly();
else 
;
}</pre>
Tento kód porušuje',
                'header' => 'Daný je nasledujúci kód:',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            61 => 
            array (
                'message' => '',
                'header' => 'Na dodržanie Liskovej princípu substitúcie v prekonávajúcich metódach treba dbať na',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            62 => 
            array (
                'message' => '',
                'header' => 'Princíp otvorenosti a uzavretosti hovorí, že',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            63 => 
            array (
                'message' => '',
                'header' => 'Zapuzdrenie v objektovo-orientovanom programovaní',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            64 => 
            array (
                'message' => '',
                'header' => 'Videnia v jazyku AspectJ',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            65 => 
            array (
                'message' => '',
                'header' => 'V diagrame sekvencií v jazyku UML obdĺžník na zvislej prerušovanej čiare, do ktorého vstupuje orientovaná hrana, označuje',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            66 => 
            array (
                'message' => '',
                'header' => 'Vyhodená výnimka v Jave je',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            67 => 
            array (
                'message' => '',
                'header' => 'Idióm Javy, v ktorom výber metódy závisí od dvoch príjemcov sa volá',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            68 => 
            array (
                'message' => '',
                'header' => 'Prístup Design by Contract je založený na',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            69 => 
            array (
                'message' => '',
                'header' => 'Liskovej princíp substitúcie stanovuje podmienky',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            70 => 
            array (
            'message' => '<pre>BufferedReader stdin = new BufferedReader(new InputStreamReader(System.in));</pre>
zabezpečuje',
                'header' => 'Kód',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            71 => 
            array (
            'message' => '<pre>List<Z> z = new LinkedList<>();
z.add(new X());
z.add(new Y());</pre>
Aby sa tento kód mohol preložiť a vykonať',
                'header' => 'Daný je nasledujúci kód:',
                'time_to_explain' => 5,
                'time_to_handle' => 2,
                'event_type_id' => 1,
                'author_id' => 2,
                'created_at' => '2020-03-01 15:36:38',
                'updated_at' => '2020-03-01 15:36:38',
                'deleted_at' => NULL,
            ),
            72 => 
            array (
                'message' => '<p><strong>Rozhodnite, ktoré z&nbsp;nasledovného je aritmetický výraz v&nbsp;jazyku C</strong></p>',
                'header' => 'Rozhodnite, ktoré z nasledovného je aritmetický výraz v jazyku C',
                'time_to_explain' => 10,
                'time_to_handle' => 1,
                'event_type_id' => 1,
                'author_id' => 6,
                'created_at' => '2020-03-04 19:32:16',
                'updated_at' => '2020-03-04 19:32:16',
                'deleted_at' => NULL,
            ),
            73 => 
            array (
                'message' => '<p><strong>Rozhodnite, ktoré z&nbsp;nasledovného je príkaz v&nbsp;jazyku C</strong></p>',
                'header' => 'Rozhodnite, ktoré z nasledovného je príkaz v jazyku C',
                'time_to_explain' => 10,
                'time_to_handle' => 1,
                'event_type_id' => 1,
                'author_id' => 6,
                'created_at' => '2020-03-04 19:33:17',
                'updated_at' => '2020-03-04 19:33:17',
                'deleted_at' => NULL,
            ),
            74 => 
            array (
                'message' => '<p><strong>Rozhodnite, ktorý z&nbsp;nasledovných je unárnym operátorom v&nbsp;jazyku C</strong></p>',
                'header' => 'Rozhodnite, ktorý z nasledovných je unárnym operátorom v jazyku C',
                'time_to_explain' => 10,
                'time_to_handle' => 1,
                'event_type_id' => 1,
                'author_id' => 6,
                'created_at' => '2020-03-04 19:35:07',
                'updated_at' => '2020-03-04 19:35:07',
                'deleted_at' => NULL,
            ),
            75 => 
            array (
                'message' => '<p><strong>Súhlasíte s&nbsp;tvrdením, že operátor / je binárnym operátorom v&nbsp;jazyku C</strong></p>',
                'header' => 'Súhlasíte s tvrdením, že operátor / je binárnym operátorom v jazyku C',
                'time_to_explain' => 5,
                'time_to_handle' => 1,
                'event_type_id' => 2,
                'author_id' => 6,
                'created_at' => '2020-03-04 19:36:56',
                'updated_at' => '2020-03-04 19:36:56',
                'deleted_at' => NULL,
            ),
            76 => 
            array (
                'message' => '<pre>int vysledok;&nbsp;</p><p>int i = 5;</p><p>&nbsp;int j = 3;</p><p>vysledok = i % j;</p><p></pre>',
                'header' => 'Daný je nasledovný príklad',
                'time_to_explain' => 10,
                'time_to_handle' => 1,
                'event_type_id' => 1,
                'author_id' => 6,
                'created_at' => '2020-03-04 19:39:10',
                'updated_at' => '2020-03-04 19:39:10',
                'deleted_at' => NULL,
            ),
            77 => 
            array (
                'message' => '<p><strong>stdio.h v&nbsp;jazyku C predstavuje</strong></p>',
                'header' => 'stdio.h v jazyku C predstavuje',
                'time_to_explain' => 10,
                'time_to_handle' => 1,
                'event_type_id' => 1,
                'author_id' => 6,
                'created_at' => '2020-03-04 19:43:50',
                'updated_at' => '2020-03-04 19:43:50',
                'deleted_at' => NULL,
            ),
            78 => 
            array (
                'message' => '<p><strong>Rozhodnite, ktorý z&nbsp;nasledovného je korektným príkazom pre preprocesor, ktorým prilinkujeme knižnicu k&nbsp;zdrojovým súborom syntaxou jazyka C.</strong></p>',
                'header' => 'Rozhodnite, ktorý z nasledovného je korektným príkazom pre preprocesor, ktorým prilinkujeme knižnicu k zdrojovým súborom syntaxou jazyka C.',
                'time_to_explain' => 10,
                'time_to_handle' => 1,
                'event_type_id' => 1,
                'author_id' => 6,
                'created_at' => '2020-03-04 19:46:57',
                'updated_at' => '2020-03-04 19:46:57',
                'deleted_at' => NULL,
            ),
            79 => 
            array (
                'message' => '<p><strong>Aplikácia s&nbsp;príponou .exe vznikne</strong></p>',
                'header' => 'Aplikácia s príponou .exe vznikne',
                'time_to_explain' => 10,
                'time_to_handle' => 1,
                'event_type_id' => 1,
                'author_id' => 6,
                'created_at' => '2020-03-04 19:48:04',
                'updated_at' => '2020-03-04 19:48:04',
                'deleted_at' => NULL,
            ),
            80 => 
            array (
                'message' => '<p><strong>Rozhodnite, ktorá z&nbsp;uvedených funkcií zabezpečuje výstup jedného znaku na štandardný výstup v&nbsp;jazyku C</strong></p>',
                'header' => 'Rozhodnite, ktorá z uvedených funkcií zabezpečuje výstup jedného znaku na štandardný výstup v jazyku C',
                'time_to_explain' => 10,
                'time_to_handle' => 1,
                'event_type_id' => 1,
                'author_id' => 6,
                'created_at' => '2020-03-04 19:49:21',
                'updated_at' => '2020-03-04 19:49:21',
                'deleted_at' => NULL,
            ),
            81 => 
            array (
            'message' => '<p>#include &lt;stdio.h&gt;</p><p>void main()</p><p>{</p><p>int c;</p><p><br>&nbsp;</p><p>c = getchar();</p><p>putchar(c);</p><p>putchar(\'\\n\');</p><p>}</p>',
                'header' => 'Rozhodnite, čo vykoná nasledovný fragment kódu v jazyku C',
                'time_to_explain' => 10,
                'time_to_handle' => 1,
                'event_type_id' => 1,
                'author_id' => 6,
                'created_at' => '2020-03-04 19:50:59',
                'updated_at' => '2020-03-04 19:50:59',
                'deleted_at' => NULL,
            ),
            82 => 
            array (
                'message' => '<p><strong>To, či výsledok po delení v&nbsp;jazyku C bude celočíselný alebo reálny závisí od</strong></p>',
                'header' => 'To, či výsledok po delení v jazyku C bude celočíselný alebo reálny závisí od',
                'time_to_explain' => 10,
                'time_to_handle' => 1,
                'event_type_id' => 1,
                'author_id' => 6,
                'created_at' => '2020-03-04 19:59:54',
                'updated_at' => '2020-03-04 19:59:54',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
