import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TondeuseComponent } from './tondeuse.component';

describe('TondeuseComponent', () => {
  let component: TondeuseComponent;
  let fixture: ComponentFixture<TondeuseComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TondeuseComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TondeuseComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
