import { Injectable } from '@angular/core';


/* MES IMPORTS  */

/* Models */
import { Arrosage } from 'src/app/intranet/models/arrosage';
/* Autres */
import { Subject } from 'rxjs';
import { HttpClient } from '@angular/common/http';



@Injectable({
  providedIn: 'root'
})



export class ArrosagesService {

  arrosages: Arrosage []=[];

  arrosageSubject = new Subject<any[]>();

  constructor(private httpClient: HttpClient) {

    let arrosages1: Arrosage = new Arrosage (1,'Réseau 1','Devant', 0.01, 9.2, true);
    let arrosages2: Arrosage = new Arrosage (2,'Réseau 2','Derrière', 0.05, 10.23, false);
    let arrosages3: Arrosage = new Arrosage (3,'Réseau 3','Côté G', 0.1, 8.7, true);
    let arrosages4: Arrosage = new Arrosage (4,'Réseau 4','Côté D', 0.013, 9.8, true);
    let arrosages5: Arrosage = new Arrosage (5,'Réseau 5','Tour bassin', 0.02, 8.9, false);
    let arrosages6: Arrosage = new Arrosage (6,'Réseau 6','Massif arrière', 0.017, 9.9, false);
    let arrosages7: Arrosage = new Arrosage (7,'Réseau 7','Massif avant', 0.4, 10, true);
    let arrosages8: Arrosage = new Arrosage (8,'Réseau 8','Portail', 0.6, 9.5, true);

    this.arrosages.push(arrosages1);
    this.arrosages.push(arrosages2);
    this.arrosages.push(arrosages3);
    this.arrosages.push(arrosages4);
    this.arrosages.push(arrosages5);
    this.arrosages.push(arrosages6);
    this.arrosages.push(arrosages7);
    this.arrosages.push(arrosages8);

  }



  /* Récupérer l'id de l'entrée sélectionnée et la passer en paramètre dans l'URL */
  public getArrosages():Arrosage[] {
    return this.arrosages;
    /*console.log(this.arrosages);*/
  }
  public getArrosage(arrosageId:number):Arrosage{
    let tableauarrosage=this.getArrosages();
    return tableauarrosage.find(i=>i.arrosageId===arrosageId);
  };



  /* Méthodes CRUD */
  /* Create */
  addArrosageApi() {
    this.httpClient
      .put('http://127.0.0.1:8000/api/addarrosage', this.arrosages)
      .subscribe(
        () => {
          console.log('Arrosage ajouté!');
        },
        (error) => {
          console.log('Erreur ! : ' + error);
        }
      );
  }
  /* Update */
  updateArrosageApi() {
    this.httpClient
      .put('http://127.0.0.1:8000/api/updatearrosage/{id}', this.arrosages)
      .subscribe(
        () => {
          console.log('Modification effectuée !');
        },
        (error) => {
          console.log('Erreur ! : ' + error);
        }
      );
  }
  /* Delete */
  deleteArrosageApi() {
    this.httpClient
      .put('http://127.0.0.1:8000/api/deletearrosage/{id}', this.arrosages)
      .subscribe(
        () => {
          console.log('Entrée supprimée !');
        },
        (error) => {
          console.log('Erreur ! : ' + error);
        }
      );
  }


  /* Méthodes de style pour le HTML */ 
  /* Méthodes pour les boutons Eteindre/Allumer */
  switchOnOne(i: number) {
    this.arrosages[i].statut = true;
  }
  switchOffOne(i: number) {
    this.arrosages[i].statut = false;
  }


}
