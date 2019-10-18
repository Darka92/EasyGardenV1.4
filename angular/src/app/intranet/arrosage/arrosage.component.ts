import { Component, OnInit, OnDestroy } from '@angular/core';


/*  MES IMPORTS */

/*  ANGULAR  */
import { Router } from '@angular/router';

/*  SERVICES  */
import { ArrosagesService } from 'src/app/services/arrosages.service';



@Component({
  selector: 'app-arrosage',
  templateUrl: './arrosage.component.html',
  styleUrls: ['./arrosage.component.css'],
})



export class ArrosageComponent implements OnInit, OnDestroy {

  arrosages = [];

  constructor(private arrosageService: ArrosagesService, private router:Router) {}

  index: number;

  ngOnInit() {
    // Appeler méthode de service
    /*this.arrosageService.getArrosagesApi();*/ //Méthode pour hydrater le tableau via une requête à l'Api

    this.arrosages = this.arrosageService.arrosages;
    /*console.log(this.arrosages);*/
  }

  ngOnDestroy() {
  }

  onSave() {
    this.arrosageService.deleteArrosageApi();
    /*console.log(this.arrosages);*/
  }


  /* Méthodes de style pour le HTML */ 
  /* Méthode pour changer la couleur du string de l'interpolation {{ arrosage.nom }} du <td> "nom" */
  getColor(statut: boolean) {
    if (statut === true) {
      return 'green';
    } else if (statut === false) {
      return 'red';
    }
  }
  /* Méthode pour les boutons Eteindre/Allumer qui appellent les deux autres méthodes dans le service arrosages.service.ts
  afin de récupérer le boolean du <td> statut */
  onSwitch(i: number, statut: boolean) {
    if (statut === true) {
      this.arrosageService.switchOffOne(i);
    } else if (statut === false) {
      this.arrosageService.switchOnOne(i);
    }
  }


}
