import { Component, OnInit, OnDestroy } from '@angular/core';


/*  MES IMPORTS */

/*  SERVICES  */
import { PortailService } from 'src/app/services/portail.service';



@Component({
  selector: 'app-portail',
  templateUrl: './portail.component.html',
  styleUrls: ['./portail.component.css']
})



export class PortailComponent implements OnInit, OnDestroy {

  data;

  index: number;

  constructor(private portailService: PortailService) {

    this.data = this.portailService.portail;

    /*console.log(this.data);*/

  }

  ngOnInit() {
  }

  ngOnDestroy() {
  }

  getColor(statut) {
    if (statut === 'Ouvert') {
      return 'green';
    } else if (statut === 'Ferme') {
      return 'red';
    }
  }

  onSwitch(i, statut) {
    if (statut === 'Ouvert') {
      this.portailService.switchOffOne(i);
    } else if (statut === 'Ferme') {
      this.portailService.switchOnOne(i);
    }
  }

  
}
