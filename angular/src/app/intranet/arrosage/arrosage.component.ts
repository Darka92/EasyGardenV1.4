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
    this.arrosages = this.arrosageService.arrosages;
    /*console.log(this.arrosages);*/
  }

  ngOnDestroy() {
  }

  getColor(statut: boolean) {
    if (statut === true) {
      return 'green';
    } else if (statut === false) {
      return 'red';
    }
  }

  onSwitch(i: number, statut: boolean) {
    if (statut === true) {
      this.arrosageService.switchOffOne(i);
    } else if (statut === false) {
      this.arrosageService.switchOnOne(i);
    }
  }


}
