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
    console.log(this.arrosages);
  }

  ngOnDestroy() {
  }

  getColor(statut) {
    if (statut === '1') {
      return 'green';
    } else if (statut === '0') {
      return 'red';
    }
  }

  onSwitch(i, statut) {
    if (statut === '1') {
      this.arrosageService.switchOffOne(i);
    } else if (statut === '0') {
      this.arrosageService.switchOnOne(i);
    }
  }


}
