import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ImgaccComponent } from './imgacc.component';

describe('ImgaccComponent', () => {
  let component: ImgaccComponent;
  let fixture: ComponentFixture<ImgaccComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ImgaccComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ImgaccComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
