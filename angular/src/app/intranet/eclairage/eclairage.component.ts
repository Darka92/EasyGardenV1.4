import { Component, OnInit, OnDestroy } from '@angular/core';


/*  MES IMPORTS */

/*  ANGULAR  */
import { Router } from '@angular/router';

/*  SERVICES  */
import { EclairagesService } from 'src/app/services/eclairages.service';



@Component({
  selector: 'app-eclairage',
  templateUrl: './eclairage.component.html',
  styleUrls: ['./eclairage.component.css']
})



export class EclairageComponent implements OnInit, OnDestroy {

  eclairages = [];

  constructor(private eclairageService: EclairagesService, private router:Router) {}

  index: number;

  ngOnInit() {
    // Appeler méthode de service
    this.eclairages = this.eclairageService.eclairages;
    /*console.log(this.arrosages);*/
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
      this.eclairageService.switchOffOne(i);
    } else if (statut === '0') {
      this.eclairageService.switchOnOne(i);
    }
  }

  
}
