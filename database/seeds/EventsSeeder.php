<?php

/**
 * Created by Bernad on 11/6/2017.
 */

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //OOP
        //Prednaska 1
        DB::table('events')->insert([
            'message' => "",
            'header' => "Zahrnutie objektu jednej triedy v objekte inej triedy sa v objektovo-orientovanom programovaní označuje ako",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "V objektovo-orientovanom programe hlavná funkcionalitatypicky",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "Konštruktor v Jave",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "Objekt v objektovo-orientovanom programovaní predstavuje",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "<pre>package abc.xyz;</pre>",
            'header' => "V programe v Jave príkaz",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "Tok údajov (stream) v Java API sa obaľuje, aby",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "<pre>import java.util.∗;</pre>",
            'header' => "Príkaz",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "Tok údajov (stream) v Java API sa otvára",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "Explicitne vytvorený konštruktor triedy v konštruktore odvodenej triedy v Jave",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "<pre>public class A {
    private int i;
    public void m(int i) {this.i = i;}
}
</pre>
Daný je objekt o triedy A. Príkaz:
<pre>o.m(5); </pre>",
            'header' => "Daná je trieda",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        //Prednaska 2
        DB::table('events')->insert([
            'message' => "",
            'header' => "Agregácia v objektovo-orientovanom programovaní",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "Abstraktná trieda v Jave",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "V objektovo-orientovanom programe hlavná funkcionalita typicky",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "<pre>public class A {
    public void f() {
        System.out.print(\"A\");
    }
    public void af() {
        System.out.print(\"Af\");
    }
}
public class B extends A {
    public void f() {
        System.out.print(\"B\");
    }
    public void bf() {
        System.out.print(\"Bf\");
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
vypíše:",
            'header' => "Daný je nasledujúci kód v Jave (každá trieda vo vlastnom súbore):",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "<pre>public class A {
    private A() {}
    private static A a = new A();
    public static A m() {
        return a;
    }
    public void f() {
        System.out.println(\"OK\");
    }
}
</pre>
Výpis hlásenia „OK“ z inej triedy možno dosiahnuť",
            'header' => "Daný je nasledujúci kód v Jave:",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "Je dobré z hľadiska objektovo-orientovaného prístupu rozsiahle používanie statických metód?",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "<pre>List a = new ArrayList();</pre>
 predstavuje:",
            'header' => "Daný je kód v Jave:",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "Uplatnenie objektu namiesto objektu typu, od ktorého je odvodený, je možné vďaka",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "Zmeniť stav objektu znamená",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "<pre>import java.io.∗;</pre>",
            'header' => "Ak potrebujeme pracovať s V/V systémom Javy, príkaz",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        //Prednaska 3
        DB::table('events')->insert([
            'message' => "<pre>public interface P {
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
}</pre>",
            'header' => "Pre ktorý návrhový vzor je tento kód charakteristický (každá trieda a rozhranie vo vlastnom súbore)?",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "Zachytenú výnimku v Jave je možné",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "<pre>public class A {
    public static int f(int i) {
        return 2 ∗ i;
    }
    public static void main(String[] args) {
        int[] a = new int[f(5)];
    }
}</pre>",
            'header' => "Pokus o preklad a vykonanie nasledujúcej triedy v Jave:",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "Návrhový vzor Strategy je vhodné použiť na",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "Prístup protected je vhodné použiť pri takých prvkoch triedy, ku ktorým chceme pristupovať len",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "Balíky v Jave sa definujú",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "",
            'header' => "Prúd údajov (stream) v Java API sa otvára",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        DB::table('events')->insert([
            'message' => "X[] a = new X [new C().m()];",
            'header' => "To, že sa v Jave veľkosť poľa dá zadať aj takto (ak metóda m() vracia int)",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        //Prednaska 4
        DB::table('events')->insert([
            'message' => "<pre>public interface K {
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
}</pre>",
            'header' => "Ktorý návrhový vzor implementuje tento kód v Jave (každá trieda a rozhranie vo vlastnom súbore)?",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => " Používateľ tento výpočet nakoniec spúšťa kliknutím na tlačidlo v používateľskom rozhraní realizovanom v rámci Swing. Samotný výpočet by z hľadiska objekovoorientovaného návrhu bolo najlepšie realizovať",
            'header' => "Okrem iného, program zabezpečuje výpočet podľa určitého vzorca.",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Dá sa v Jave urobiť inštancia rozhrania?",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "V rámci Swing sa kliknutie na tlačidlo v okne sleduje",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Synchronizácia nestatickej metódy",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Inštancia rozhrania v Jave",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Rozhranie v Jave definuje",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "V triede, ktorá dedí od rozhrania je možné zadefinovať",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "<pre>interface Abc {
    void m();
}</pre>Z pohľadu prekladu v nasledujúcom kóde
<pre>Abc o;
o = new Abc();
o.m();</pre>",
            'header' => "Dané je rozhranie:",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "V triede, ktorá implementuje rozhranie, je možné zadefinovať",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        //Prednaska 5
        DB::table('events')->insert([
            'message' => "<pre>class C implements Serializable {
    String[] s = new String[9999];
}</pre>
Dané sú inštancie triedy C:
<pre>C a = new C();
C b = new C();
C c = new C();</pre>
Serializovať tieto inštancie naraz (jedným zápisom do jedného súboru)",
            'header' => "Daná je trieda",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "<pre>List<Z> z = new LinkedList<>();
z.add(new X());
z.add(new Y());
</pre>
Aby sa tento kód mohol preložiť a vykonať",
            'header' => "Daný je nasledujúci kód:",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "<pre>public class A {
    void m(int i) { }
    void m(int i, int j) { }
}
public class B extends A {
    void n(int i) { }
    void m(int i, int j) { }
}</pre>",
            'header' => "Daný je nasledujúci kód v Jave:",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "<pre>class Utvar {
    int farba = 12;
    void nakresli() { }
}
class Kruh extends Utvar {
    void nakresli(int f) {
        System.out.println(\"Kruh farby \" + f) ;
    }
}</pre>
Potom kód: 
<pre>Kruh k = new Kruh();
k.nakresli();</pre>",
            'header' => "Daný je nasledujúci kód v Jave:",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Pomocou kľúčového slova super sa v Jave dá zavolať",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Zavedenie (import) viacerých balíkov v Jave môže spôsobiť",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Atribút triedy, ktorému predchádza kľúčové slovo private",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Import balíka do programu v Jave",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        //Prednaska 6
        DB::table('events')->insert([
            'message' => "",
            'header' => "Niť v Jave vzniká",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Vyhodenie výnimky v Jave",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "<pre>class MyException extends Exception {}
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
Metóda m() triedy B",
            'header' => "Daný je nasledujúci kód:",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Spracovanie výnimky v Jave sa realizuje",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Anonymné triedy, odkazy na metódy a lambda výrazy sa v Jave používajú na",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "<pre>class A {
    void a() throws XException {
        if(...) {...}
        else throw new XException();
    }
}
class B {
    void b() throws XException {new A().a();}
}</pre>
Metóda b() triedy B",
            'header' => "Daný je nasledujúci kód:",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Synchronizované metódy v Jave",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "<pre>class MyException extends Exception {}
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
Metóda b() triedy B",
            'header' => "Daný je nasledujúci kód v Jave:",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Iterátory v Java API uľahčujú",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "<pre>public abstract class T {
    abstract void a();
    void b() {...};
}</pre>
Inštancia tejto triedy sa",
            'header' => "Daná je trieda:",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Rozšírená slučka for v Jave pri aplikácii na zoskupenie",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Porušenie Liskovej princípu substitúcie spôsobí",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

        //Prednaska 7
        DB::table('events')->insert([
            'message' => "",
            'header' => "Dá sa urobiť inštancia abstraktnej triedy?",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "<pre>1 abstract class A { }
2 interface I { }
3 A[] a = new A[5];
4 I[] i = new I[5];</pre>
Tento kód sa",
            'header' => "Daný je nasledujúci kód:",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "<pre>for (Object o : l) {
    if (o.class == Frog.class)
        ((Frog)o).jump();
    else if (o.class == Bird.class)
        ((Bird)o).fly();
    else 
        ;
}</pre>
Tento kód porušuje",
            'header' => "Daný je nasledujúci kód:",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Na dodržanie Liskovej princípu substitúcie v prekonávajúcich metódach treba dbať na",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Princíp otvorenosti a uzavretosti hovorí, že",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Zapuzdrenie v objektovo-orientovanom programovaní",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Videnia v jazyku AspectJ",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "V diagrame sekvencií v jazyku UML obdĺžník na zvislej prerušovanej čiare, do ktorého vstupuje orientovaná hrana, označuje",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Vyhodená výnimka v Jave je",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Idióm Javy, v ktorom výber metódy závisí od dvoch príjemcov sa volá",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Prístup Design by Contract je založený na",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "",
            'header' => "Liskovej princíp substitúcie stanovuje podmienky",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "<pre>BufferedReader stdin = new BufferedReader(new InputStreamReader(System.in));</pre>
zabezpečuje",
            'header' => "Kód",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);


        DB::table('events')->insert([
            'message' => "<pre>List<Z> z = new LinkedList<>();
z.add(new X());
z.add(new Y());</pre>
Aby sa tento kód mohol preložiť a vykonať",
            'header' => "Daný je nasledujúci kód:",
            'time_to_explain' => 5,
            'time_to_handle' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'author_id' => 2,
            'event_type_id' => 1,
        ]);

    }
}
